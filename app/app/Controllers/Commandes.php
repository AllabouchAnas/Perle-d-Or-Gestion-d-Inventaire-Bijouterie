<?php

namespace App\Controllers;

use App\Models\CommandeModel;
use App\Models\ClientModel;
use App\Models\DetailCommandeModel; // Create a model for order details if not already existing
use CodeIgniter\Controller;
use Dompdf\Dompdf;
use Dompdf\Options;

class Commandes extends Controller
{
    protected $commandeModel;
    protected $clientModel;
    protected $detailCommandeModel;

    public function __construct()
    {
        $this->commandeModel = new CommandeModel();
        $this->clientModel = new ClientModel();
        $this->detailCommandeModel = new DetailCommandeModel(); // Ensure DetailCommandeModel is created
    }

    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('commandes');
        $builder->select('commandes.*, clients.nom AS client_nom');
        $builder->join('clients', 'commandes.client_id = clients.id');

        $data['commandes'] = $builder->get()->getResultArray();
        $data['clients'] = $this->clientModel->findAll();

        return view('admin/commandes/index', $data);
    }

    public function getOrderDetails($id)
    {
        // Fetch order details from detailcommandes table based on commande_id
        $details = $this->detailCommandeModel
            ->where('commande_id', $id)
            ->findAll();

        // Debug output
        if (empty($details)) {
            return $this->response->setJSON(['error' => 'No details found']);
        }

        return $this->response->setJSON($details);
    }

    public function generateBonDeCommande($id)
    {
        // Récupérer la commande et le client
        $commande = $this->commandeModel->find($id);
        $client = $this->clientModel->find($commande['client_id']);

        // Récupérer les détails de la commande
        $details = $this->detailCommandeModel
            ->where('commande_id', $id)
            ->findAll();

        // Si la commande n'existe pas, retourner une erreur
        if (!$commande) {
            return redirect()->to('/commandes')->with('errors', 'Commande introuvable');
        }

        // Créer les options Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true); // pour charger des images distantes si nécessaire

        // Initialiser Dompdf avec les options
        $dompdf = new Dompdf($options);

        // Charger la vue pour le PDF
        $html = view('commandes/bon_de_commande', [
            'commande' => $commande,
            'client' => $client,
            'details' => $details
        ]);

        // Charger le HTML dans Dompdf
        $dompdf->loadHtml($html);

        // Définir le format de la page (A4 en portrait)
        $dompdf->setPaper([0, 0, 595, 595], 'portrait');

        // Renderiser le PDF
        $dompdf->render();

        // Téléchargement ou affichage dans le navigateur
        $dompdf->stream("bon_de_commande_" . $commande['id'] . ".pdf", ["Attachment" => true]);
    }

    public function store()
    {
        $data = [
            'date_commande' => $this->request->getPost('date_commande'),
            'statut'        => $this->request->getPost('statut'),
            'prix_total'    => $this->request->getPost('prix_total'),
            'client_id'     => $this->request->getPost('client_id'),
        ];

        if ($this->commandeModel->save($data)) {
            return redirect()->to('/commandes')->with('success', 'Order created successfully.');
        } else {
            return redirect()->back()->with('errors', $this->commandeModel->errors())->withInput();
        }
    }

    // 5. Update Commande
    public function update($id)
    {
        $data = [
            'id'            => $id,
            'date_commande' => $this->request->getPost('date_commande'),
            'statut'        => $this->request->getPost('statut'),
            'prix_total'    => $this->request->getPost('prix_total'),
            'client_id'     => $this->request->getPost('client_id'),
        ];

        if ($this->commandeModel->save($data)) {
            return redirect()->to('/commandes')->with('success', 'Order updated successfully.');
        } else {
            return redirect()->back()->with('errors', $this->commandeModel->errors())->withInput();
        }
    }

    // 6. Delete Commande
    public function delete($id)
    {
        if ($this->commandeModel->delete($id)) {
            return redirect()->to('/commandes')->with('success', 'Order deleted successfully.');
        } else {
            return redirect()->to('/commandes')->with('errors', 'Failed to delete order.');
        }
    }
}

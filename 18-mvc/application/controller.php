<?php
class Controller
{
    public $load;
    public $model;

    public function __construct()
    {
        $this->load = new load;
        $this->model = new Model;

        $this->handleRequest();
    }
    private function handleRequest()
    {
        $request_url = $_SERVER['REQUEST_URI'];
        $parsed_url = parse_url($request_url);
        $path = trim($parsed_url['path'] ?? '',  '/');
        if ($path || !isset($_GET['method'])) {
            $segments = explode('/', $path);
            $method = $segments[0] ?? 'index';
            $id = $segments[1] ?? null;
        } else {
            $method = $_GET['method'] ?? 'index';
            $id = $_GET['id'] ?? null;
        }
        switch ($method) {
            case 'show':
                $this->show($id);
                break;
            case 'add':
                $this->add();
                break;
            case 'edit':
                $this->update($id);
                break;
            case 'store':
                $this ->store();
                break;
            case 'update':
                $this->update();
                break;
            case 'eliminar':
                $this->delete($id);
                break;

            default:
                $this->index();
                break;
        }
    }
    private function index()
    {
        $pokemons = $this->model->listPokemons();
        $this->load->view('welcome.php', $pokemons);
    }
    private function add()
    {
        $trainers = $this->model->listTrainers();
        $this->load->view('add.php', $trainers);
    }
    private function show($id)
    {
        $pokemon = $this->model->showPokemon($id);
        $this->load->view('show.php', $pokemon);
    }
    private function store()
    {
        $name = trim($_POST['name'] ?? '');
        $type = trim($_POST['type'] ?? '');
        $trainer_id = trim($_POST['trainer_id'] ?? '');
        $strenght = trim($_POST['strength'] ?? '');
        $stamina = trim($_POST['stamina'] ?? '');
        $speed = trim($_POST['stamina'] ?? '');
        $accuracy = trim($_POST['accuracy'] ?? '');
    }
    private function update()
    {
        $id = trim($_POST['id'] ?? 0);
        $name = trim($_POST['name'] ?? '');
        $type = trim($_POST['type'] ?? '');
        $trainer_id = trim($_POST['trainer_id'] ?? '');
        $strenght = trim($_POST['strength'] ?? '');
        $stamina = trim($_POST['stamina'] ?? '');
        $speed = trim($_POST['stamina'] ?? '');
        $accuracy = trim($_POST['accuracy'] ?? '');

        if (!empty($name) && !empty($type) && !empty($trainer_id)) {
            $this->model->updatePokemon($id, $name, $type, $trainer_id, $strenght, $stamina, $speed, $accuracy);
        }
    }
    private function delete($id)
    {
        $id = trim($_POST['id'] ?? 0);                   
    }
}

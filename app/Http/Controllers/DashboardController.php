<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $usuarios = User::all()->count();

        // Grafico 1 - usuários 
        $userData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total'),

        ])
            ->groupBy('ano')
            ->orderBy('ano', 'asc')
            ->get();

        // Preparar arrays
        foreach ($userData as $user) {
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        // Formatar para chartjs

        $userLabel = "'Comparativos de cadastros de usuários'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);


        // gráfico 2 - Categorias

        $catData = Categoria::with('produtos')->get();

        // preparar o array

        foreach ($catData as $cat) {
            $catNome[] = "'" . $cat->nome . "'";
            $catTotal[] = $cat->produtos->count();
        }

        // Formatar para chartjs

        $catLabel = implode(',', $catNome);
        $catTotal = implode(',', $catTotal);

        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));
    }
}

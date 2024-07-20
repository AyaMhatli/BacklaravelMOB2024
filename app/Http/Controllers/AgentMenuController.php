<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentMenuController extends Controller
{
    public function index()
    {
        $agentMenus = AgentMenu::all();
        return view('agent_menus.index', compact('agentMenus'));
    }
}
 
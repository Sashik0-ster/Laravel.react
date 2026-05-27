<?php

namespace App\View\Components\Sidebars;

trait SidebarData
{
    public array $menuItems;

    public function getMenuItems()
    {
        $this->menuItems = [
            ['title' => 'Головна', 'route' => 'pages.dashboard', 'icon' => 'business-report-svgrepo-com.svg'],
            ['title' => 'Рахунки', 'route' => 'pages.accounts', 'icon' => 'wallet-svgrepo-com.svg'],
            ['title' => 'Доходи', 'route' => 'pages.income', 'icon' => 'currencies-svgrepo-com.svg'],
            ['title' => 'Витрати', 'route' => 'pages.expense', 'icon' => 'wallet-svgrepo-com.svg'],
            ['title' => 'Цілі', 'route' => 'pages.goal', 'icon' => 'wallet-svgrepo-com.svg'],
            ['title' => 'База знань', 'route' => 'pages.saving', 'icon' => 'profit-svgrepo-com.svg'],
        ];
    }

}

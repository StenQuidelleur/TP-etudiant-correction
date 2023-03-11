<?php

namespace App\Controllers;

use App\Entity\Item;
use App\Models\ItemManager;

class ItemController extends AbstractController
{
    /**
     * List Items
     *
     * @return string
     */
    public function index(): string
    {
        $ItemManager = new ItemManager();
        $items = $ItemManager->selectAll();

        return $this->render('Item/index', ['items' => $items]);
    }

    /**
     * Show informations for a specific item
     * 
     * @param int $id
     * 
     * @return string
     */
    public function show(int $id): string
    {
        $itemManager = new ItemManager();
        $item = $itemManager->selectOneById($id);

        return $this->render('Item/show', ['item' => $item]);
    }

    /**
     * Edit a specific item
     * 
     * @param int $id
     * 
     * @return string|null
     */
    public function edit(int $id): ?string
    {
        $itemManager = new ItemManager();
        $item = $itemManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $item = array_map('trim', $_POST);

            // TODO validations (length, format...)
            if ($item['title'] === '') {
                return 'Input Title is empty';
            }

            // if validation is ok, update and redirection
            $itemManager->update($item);

            header('Location: /items/show?id=' . $id);

            // we are redirecting so we don't want any content rendered
            return null;
        }

        return $this->render('Item/edit', ['item' => $item]);
    }

    /**
     * Add a new item
     *
     * @return string|null
     */
    public function add(): ?string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $item = array_map('trim', $_POST);
            
            // TODO validations (length, format...)
            if ($item['title'] === '') {
                return 'Input Title is empty';
            }

            // transform data to object
            $item = new Item($item['title']);

            // if validation is ok, insert and redirection
            $itemManager = new ItemManager();
            $id = $itemManager->insert($item);

            header('Location:/items/show?id=' . $id);
            return null;
        }

        return $this->render('Item/create');
    }

    /**
     * Delete a specific item
     *
     * @return void
     */
    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $itemManager = new ItemManager();
            $itemManager->delete((int)$id);

            header('Location:/items');
        }
    }
}
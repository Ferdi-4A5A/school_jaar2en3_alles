<?php

require_once 'model/class.ContactsService.php';
require_once 'model/class.TemplatingSystem.php';

class ContactsController
{
    // werkt het om $_GET af te vangen met een ahref in een form als je meerdere $_GET levels kan hebben? of is dat niet het beste/kan dat niet eens?
    // heb je ook een soort baseController voor models? waar je bijv de database verbinding in kan zetten, of doe je dat in index.php
    // waar is die base controller?
    // PHP.ini in phpstorm ergens, error reporting aanzetten



    // alles in ajax proberen te fixen

    // je maakt dus 1 functie aan waarin je alles inzet om een bepaalde pagina te laden? wtf


    private $contactsService = NULL;

    public function __construct() {
        $this->contactsService = new ContactsService('192.168.56.1','mvc','mainuser','dev01dev');
    }

    public function readAllContactData() {
        $orderby = isset($_GET['orderby'])?$_GET['orderby']:NULL;
        $contacts = $this->contactsService->readContacts($orderby);
        $table = $this->contactsService->createContactTable($contacts);

        $columnID = 'mvcID';
        $selectName = 'select1';
        $columnTitle = 'mvcName';
        $select1 = $this->contactsService->createSelect($contacts, $selectName, $columnID, $columnTitle, 1);

        if (isset($_POST['select1']) || isset($_POST['select2'])) {
            $selectName = 'select2';
            $columnTitle = 'mvcEmail';
            $select2 = $this->contactsService->createSelect($contacts, $selectName, $columnID, $columnTitle, 2);
        }

        if (isset($_POST['select2'])) {
            $selectName = 'select3';
            $columnTitle = 'mvcPhone';
            $select3 = $this->contactsService->createSelect($contacts, $selectName, $columnID, $columnTitle, 3);
        }

        include 'view/contacts.php';
    }

    // Hier dus een method aanmaken met deleteContactData en dan de ID meegeven
    public function deleteContactData($params) {
        $id = implode(" ",$params);
        $this->contactsService->deleteContactData($id);
    }

    public function readTemplateData() {
        $this->TemplatingSystem = new TemplatingSystem('default', '.tpl');
        $this->TemplatingSystem->readTemplate();
    }

    function read() {
        $template = new TemplatingSystem('default', '.tpl');
        $template->parseTemplate();
        $template->setTemplateData("ffs", "gg");
    }

//    public function readData() {
//        $id = isset($_GET['id'])?$_GET['id']:NULL;
//        if (!$id) {
//            throw new Exception('Internal error.');
//        }
//        $contact = $this->contactsService->readContact($id);
//
//        include '../view/contacts.php';
//    }

}
//echo $this->setTemplateData('bla', 'ja');
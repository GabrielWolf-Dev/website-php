<?php
use Mailer\Form;

$form = new Form($_POST);
$form->sendForm();
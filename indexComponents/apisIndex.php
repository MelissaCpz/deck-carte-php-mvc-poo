<?php

// accessible SSI $url[0] === "api"

switch ($url[1]) {
    case "personnages" :
        $apisController->charactersApi();
        break;

    case "classes" :
        $apisController->classesApi();
        break;

    case "membres" :
        $apisController->usersApi();
        break;

    case "global" :
        $apisController->globalApi();
        break;

    case "apiPage" :
        $apisController->apisPage();
        break;
}
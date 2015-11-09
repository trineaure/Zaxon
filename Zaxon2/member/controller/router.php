<?php

//MEMBER
// Controller layer - the router selects controller to use depending on URL and request parameters
class Router {

    /**
     * Returns the requested page name
     */
    public function getPage() {
        // Get page from request, or use default
        if (isset($_REQUEST["page"])) {
            $page = $_REQUEST["page"];
        } else {
            $page = $GLOBALS["DEFAULT_PAGE"];
        }
        return $page;
    }

    //
    /**
     * Decide which page to show
     * @return Controller
     */
    public function getController() {
        $page = $this->getPage();
        switch ($page) {


            case "pricelist":
                return new pricelistController();

            case "aboutus":
                return new aboutusController();

            case "contact":
                return new contactController();

            case "showEmployee":
                return new showController();

            case "memberAdd":
            case "memberAdded":
                return new memberController();

            case "updateInformation":
            case "updateInformationNow":
                return new updateController();


            case "order":
            case "chooseTreatment":
            case "reservationDateAndEmployee":
            case "reservationTime":
            case "reservationComplete":
            case "reservationTreatmentFinish" :
                return new reservationController();

            case "myReservations":
                return new showController();

            case "home":
            default:
                return new homeController();
        }
    }

}

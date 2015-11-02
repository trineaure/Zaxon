<?php

//ADMIN
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

            case "showMembers":
            case "showEmployee":
                return new showController();

            case "searchMember":
            case "searchEmployee":
                return new searchController();

            case "deleteMember":
            case "deleteMemberNow":
            case "deleteEmployee":
            case "deleteEmployeeNow":
                return new deleteController();

            case "updateMember":
            case "updateMemberNow":
            case "updateEmployee":
            case "updateEmployeeNow":
                return new updateController();

            case "memberAdd":
            case "memberAdded":
                return new memberController();

            case "order":
            case "chooseTreatment":
            case "reservationDateAndEmployee":
            case "reservationTime":
            case "reservationComplete":
                return new reservationController();

            case "home":
            default:
                return new homeController();
        }
    }

}

var app =
    angular
        .module("TestApp", [
            "ngMaterial",
            "ui.router",
            "angular-md5"
        ])
        .run(function($rootScope) {
            // Default repository
            $rootScope.repository = "https://github.com/composer/composer";
        })
        .config(function($stateProvider, $urlRouterProvider) {
            // Define every state of our "webapp"

            // First state
            $urlRouterProvider.otherwise("/dashboard");

            $stateProvider
                .state('DashboardIndex', {
                    url: "/dashboard",
                    views: {
                        "main": {
                            templateUrl: "/dashboard"
                        }
                    }
                })
                .state('LastCommits', {
                    url: "/last_commits",
                    views: {
                        "main": {
                            templateUrl: "/dashboard/last_commits"
                        }
                    }
                })
                .state('TopContributors', {
                    url: "/top_contributors",
                    views: {
                        "main": {
                            templateUrl: "/dashboard/top_contributors"
                        }
                    }
                })
                .state('ListBranches', {
                    url: "/list_branches",
                    views: {
                        "main": {
                            templateUrl: "/dashboard/list_branches"
                        }
                    }
                });
        })
        .controller('AppCtrl', function ($scope, $rootScope, $timeout, $mdSidenav, $mdMedia, $mdDialog) {
            // Small fix
            $scope.$mdMedia = $mdMedia;

            // Toggle sidenav
            $scope.toggle = function(component) { $mdSidenav(component).toggle(); }


            // In case of error
            $rootScope.showAlert = function() {
                $mdDialog.alert({
                    title: 'Attention',
                    textContent: 'Something bad happends.',
                    ok: 'Close'
                });
            };
        })
        .controller('DashboardIndexCtrl', function ($scope, $rootScope, $timeout, $mdSidenav) {
            $scope.toggle = function(component) { $mdSidenav(component).toggle(); }

            $scope.$watch(function() { return $rootScope.repository; }, function() {
                // Repository has been changed, we need to reset all variables
                delete $scope.latest_commits;
                delete $scope.top_contributors;
                delete $scope.list_branches;
            });
        })
        .controller('LeftCtrl', function ($scope, $timeout, $mdSidenav) {

        })
        .controller('LastCommitsCtrl', function ($scope, $rootScope, $http) {
            // Retrieve the last commits from ajax service we have just created
            $http.post("/ajax/ajax_last_commits", {url : $rootScope.repository}).then(function successCallback(response) {
                // If everything works fine assign a new variable
                if (response.data != "false")
                    $scope.latest_commits = response.data;
            },
                // otherwise shows an error message
                $rootScope.showAlert);
        })
        .controller('TopContributorsCtrl', function ($scope, $rootScope, $http) {
            $http.post("/ajax/ajax_top_contributors", {url : $rootScope.repository}).then(function successCallback(response) {
                if (response.data != "false")
                    $scope.top_contributors = response.data;
            }, $rootScope.showAlert);
        })
        .controller('ListBranchesCtrl', function ($scope, $rootScope, $http) {
            $http.post("/ajax/ajax_list_branches", {url : $rootScope.repository}).then(function successCallback(response) {
                if (response.data != "false")
                    $scope.list_branches = response.data;
            }, $rootScope.showAlert);
        })
        .controller('InfoCtrl', function ($scope) {
            $scope.info = [
                {"title":"AngularJS","more":"http://www.angularjs.org","avatar":"/img/avatar/angularjs.png", "description" : "Javascript framework that allows me to write less javascript code. I've used ui-router plugin that give the opportunity to manage new pages in ajax without loading full page and increasing speeds."},
                {"title":"Php","more":"http://www.php.net","avatar":"/img/avatar/php.png", "description" : "Compatible with both PHP 5 and 7."},
                {"title":"Material AngularJS","more":"http://material.angularjs.org","avatar":"/img/avatar/angularjs.png", "description" : "Library for AngularJS that creates an Android like envoirment. It changes style and "},
                {"title":"CodeIgniter","more":"http://www.codeigniter.com","avatar":"/img/avatar/codeigniter.png", "description" : "For a quick test I've choose this PHP Framework. Quick and small, 2 mb to unzip and we are ready to go. I've not used any git library even if there is a large availability because I've no need to authenticate via OAuth2 and every request is made by just a curl request. I've create 2 controllers (3 counting the one that create the base layout of the page)."}
            ];
        })

        // <input git-hub-validator>
        // @return true / false

        .directive('gitHubValidator', function () {
            // A small validator to check the correct formatting of the github url
            return {
                require: '?^ngModel',
                controller: function () {
                },
                scope: true,
                link: function (scope, element, attrs, ngModelCtrl) {
                    ngModelCtrl.$validators.integer = function (modelValue, viewValue) {
                        if (ngModelCtrl.$isEmpty(modelValue)) {
                            return true;
                        }

                        var re = new RegExp('^(https|http):\\/\\/github.com\\/([a-zA-Z0-9\\-\\_]*)\\/([a-zA-Z0-9\\-\\_]*)(|\\/)$', 'i');

                        console.log(re);

                        if (re.test(viewValue)) {
                            // it is valid
                            return true;
                        }

                        // it is invalid
                        return false;
                    };
                }
            };
        })

        // (array | slide : 0 - start, 10 - end)
        // @return array

        .filter('slice', function() {
            // A small slice array filter
            return function(arr, start, end) {
                return arr.slice(start, end);
            };
        });
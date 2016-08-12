<html lang="en" >
<head>
    <title>Test 2112 - Claudio Mulas</title>
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Angular Material style sheet -->
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/angular_material/1.0.9/angular-material.min.css">
</head>
<body ng-app="TestApp">
<div ng-controller="AppCtrl" layout="row">

    <md-sidenav
        class="md-sidenav-left"
        md-component-id="left"
        md-is-locked-open="$mdMedia('gt-md')"
        md-whiteframe="4">
        <md-toolbar class="md-theme-indigo">
            <h1 class="md-toolbar-tools">Menu</h1>
        </md-toolbar>
        <md-content layout-padding ng-controller="LeftCtrl">
            <md-button class="md-primary full-width" ng-href="#/dashboard">Settings</md-button>
            <md-button class="md-primary full-width" ng-href="#/last_commits">Last commits</md-button>
            <md-button class="md-primary full-width" ng-href="#/top_contributors">Top 10 contributor</md-button>
            <md-button class="md-primary full-width" ng-href="#/list_branches">Branches list</md-button>
        </md-content>
    </md-sidenav>
    <md-sidenav
        class="md-sidenav-right"
        md-component-id="right"
        md-whiteframe="4">
        <md-toolbar class="md-theme-indigo">
            <h1 class="md-toolbar-tools">Information about project</h1>
        </md-toolbar>
        <md-content layout-padding ng-controller="InfoCtrl">
            <p>What I've used for create this demo.</p>
            <md-list class="md-dense" flex>
                <md-list-item class="md-2-line" ng-repeat="i in info">
                    <img ng-src="{{i.avatar}}" class="md-avatar" alt="{{i.title}}" />
                    <div class="md-list-item-text">
                        <h3>{{i.title}}</h3>
                        <p>{{i.description}}</p>
                    </div>
                </md-list-item>
                <md-divider ></md-divider>
            </md-list>
        </md-content>
    </md-sidenav>

    <section layout="column" flex>
        <md-toolbar class="md-whiteframe-glow-z1 site-content-toolbar">
            <div class="md-toolbar-tools">
                <md-button class="md-icon-button" aria-label="Menu" ng-if="!$mdMedia('gt-md')" ng-click="toggle('left')">
                    <md-icon md-svg-icon="/img/icons/menu.svg"></md-icon>
                </md-button>
                <h2>
                    <span>Test 2112 - Claudio Mulas</span>
                </h2>
                <span flex></span>
                <md-button class="md-icon-button" aria-label="More information" ng-click="toggle('right')">
                    <md-icon md-svg-icon="/img/icons/help.svg"></md-icon>
                </md-button>
            </div>
        </md-toolbar>
        <md-content md-scroll-y layout="column" flex style="overflow:visible">
            <div ui-view="main" layout-padding flex="noshrink"></div>
        </md-content>
    </section>
</div>




<!-- Angular Material requires Angular.js Libraries -->
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-animate.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-aria.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-messages.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.13/angular-ui-router.min.js"></script>
<script src="<?php echo base_url(); ?>js/angularjs-md5.min.js"></script>

<!-- Angular Material Library -->
<script src="//ajax.googleapis.com/ajax/libs/angular_material/1.0.9/angular-material.min.js"></script>

<!-- Test App -->
<script src="/js/script.js"></script>

<!-- Small Css Customization -->
<style type="text/css">
    .full-width { width:90%; }
</style>

</body>
</html>
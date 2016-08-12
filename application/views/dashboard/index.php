<form name="form_repository" ng-init="tmp_repository = repository">
    <md-card md-theme-watch>
        <md-content layout-padding>
            <p>Set repository</p>
            <md-input-container class="md-block">
                <label>Url Repository</label>
                <input ng-model="tmp_repository" required="true" git-hub-validator="true">
            </md-input-container>
        </md-content>
        <md-card-actions layout="row" layout-align="end center">
            <md-button class="md-raised md-primary" ng-click="repository = tmp_repository" ng-disabled="form_repository.$invalid">Save</md-button>
        </md-card-actions>
    </md-card>
</form>
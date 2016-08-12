<div ng-controller="TopContributorsCtrl">
    <div ng-if="!top_contributors" layout="row" layout-align="space-around">
        <md-progress-circular md-mode="indeterminate"></md-progress-circular>
    </div>

    <div ng-if="top_contributors">
        <div layout="row" layout-align="end end">
            <div>
                <md-input-container>
                    <label>Limit</label>
                    <md-select ng-model="limit" ng-init="limit = limit || 10">
                        <md-option ng-repeat="y in [5, 10, 25, 50, 100]" value="{{y}}">
                            {{y}}
                        </md-option>
                    </md-select>
                </md-input-container>
            </div>
        </div>
        <md-card>
            <md-list>
                <md-list-item ng-repeat="c in (top_contributors | slice : 0 : limit)" ng-href="{{c.html_url}}" class="md-2-line">
                    <img alt="{{c.author.login}}" ng-src="{{c.author.avatar_url}}" class="md-avatar">
                    <div class="md-list-item-text" layout="column">
                        <p>{{c.author.login}}</p>
                        <h4>{{c.total}} commits</h4>
                    </div>
                </md-list-item>
            </md-list>
        </md-card>
    </div>
</div>
<div ng-controller="ListBranchesCtrl">
    <div ng-if="!list_branches" layout="row" layout-align="space-around">
        <md-progress-circular md-mode="indeterminate"></md-progress-circular>
    </div>

    <div ng-if="list_branches">
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
                <md-list-item ng-repeat="b in (list_branches | slice : 0 : limit)" class="md-2-line">
                    <div class="md-list-item-text" layout="column">
                        <p>{{b.name}}</p>
                    </div>
                </md-list-item>
            </md-list>
        </md-card>
    </div>
</div>
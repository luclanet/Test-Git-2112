<div ng-controller="LastCommitsCtrl">
    <div ng-if="!latest_commits" layout="row" layout-align="space-around">
        <md-progress-circular md-mode="indeterminate"></md-progress-circular>
    </div>

    <div ng-if="latest_commits">
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
                <md-list-item ng-repeat="c in (latest_commits | slice : 0 : limit)" ng-href="{{c.html_url}}" class="md-3-line">
                    <img alt="{{c.author.login}}" ng-src="{{c.author.avatar_url}}" class="md-avatar">
                    <div class="md-list-item-text" layout="column">
                        <p>{{c.commit.author.name + " " + c.author.login}}</p>
                        <h4>{{c.commit.committer.date}}</h4>
                        <p>{{c.commit.message}}</p>
                    </div>
                </md-list-item>
            </md-list>
        </md-card>
    </div>
</div>
!function ($, React, Bootstrap) {

    var Issue = React.createClass({displayName: "Issue",
        render: function() {
            var
                url = '/bug/' + this.props.issue.id,
                time = this.props.issue.created_at;
            time = time.replace(/\+\d{2}:\d{2}$/, '');
            time = time.replace('T', ' ');
            return (
                React.createElement("tr", null, 
                    React.createElement("td", null, this.props.issue.level), 
                    React.createElement("td", null, React.createElement("a", {href: url}, this.props.issue.title)), 
                    React.createElement("td", null, time)
                )
            );
        }
    });

    var rows = [], colors = {};

    var IssueList = React.createClass({displayName: "IssueList",
        render: function() {
            this.props.issues.forEach(function(issue) {
                rows.unshift(React.createElement(Issue, {issue: issue}));
            });
            return (
                React.createElement("div", null, rows)
            );
        }
    });

    $.getJSON('/api/bug/level', function (data) {
        $.each(data, function (key, value){
            colors[key] = value;

        });
    });

    var lastModified = null;
    var pollUpdateIssue = function () {
        var time = lastModified || (Date.now() / 1000);
        time = Math.floor(time);
        var url = '/api/bug/updates/' + time;
        $.ajax({
            type: 'GET',
            async: true,
            cache: false,
            url: url,
            success: function(data) {
                document.getElementById('updates').innerHTML = '';
                var issues = JSON.parse(data || '[]');
                React.render(
                    React.createElement(IssueList, {issues: issues}),
                    document.getElementById('updates')
                );
                lastModified = (Date.now() / 1000);
                for (x in colors) {
                    $('.' + x).css('background-color', '#' + colors[x]);
                }
            }
        });
    };
    pollUpdateIssue();
    setInterval(pollUpdateIssue, 5000);

}(window.jQuery, window.React, window.Bootstrap);


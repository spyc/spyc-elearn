!function ($, React, Bootstrap) {
    var bug = '/api/' + window.location.pathname;
    var TabLabel = Bootstrap.TabLabel;
    var Issue = React.createClass({displayName: "Issue",
        render: function() {
            var content = markdown.toHTML(this.props.detail);
            var status = this.props.status.charAt(0).toUpperCase() + this.props.status.substr(1);
            return (
                React.createElement("div", {className: "container"}, 
                    React.createElement("h2", null, 
                        this.props.title, 
                        React.createElement(TabLabel, {level: this.props.level}, 
                            this.props.level
                        )
                    ), 
                    React.createElement("span", {className: "lead"},  status ), 
                    React.createElement("span", {className: "help-block"},  this.props.updated), 
                    React.createElement("div", {className: "container", dangerouslySetInnerHTML: { __html: content}})
                )
            );
        }
    });
    $.getJSON(bug, function(result){
        console.log('');
        React.render(
            React.createElement(Issue, {
                title: result.title, 
                updated: result.update_at, 
                detail: result.detail, 
                level: result.level, 
                status: result.status}
                ),
            document.getElementById('wrap')
        );
        UI.label();
    });
}(jQuery, React, Bootstrap);
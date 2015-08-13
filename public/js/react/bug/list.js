!function ($, React, Bootstrap) {

    $.getJSON('/api/bug/level', function (data) {
        $.each(data, function (key, value){
            $('.' + key).css('background-color', '#' + value);
        });
    });

    var Issue = React.createClass({displayName: "Issue",
        render: function() {
            var
                url = '/bug/' + this.props.issue.id,
                time = this.props.issue.created_at;
            time = time.replace(/(((\+|-).*)|UTC)$/, '');
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

}(window.jQuery, window.React, window.Bootstrap);


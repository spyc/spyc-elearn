!function ($, React, Bootstrap) {

    $.getJSON('/api/bug/level', function (data) {
        $.each(data, function (key, value){
            $('.' + key).css('background-color', '#' + value);
        });
    });

    var Issue = React.createClass({
        render: function() {
            var
                url = '/bug/' + this.props.issue.id,
                time = this.props.issue.created_at;
            time = time.replace(/(((\+|-).*)|UTC)$/, '');
            time = time.replace('T', ' ');
            return (
                <tr>
                    <td>{this.props.issue.level}</td>
                    <td><a href={url}>{this.props.issue.title}</a></td>
                    <td>{time}</td>
                </tr>
            );
        }
    });

}(window.jQuery, window.React, window.Bootstrap);


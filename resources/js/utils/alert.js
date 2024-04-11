(function($) {
    $.fn.AlertMessage = function(type, message) {
        var alertType = 'alert-primary'; // default type
        var textBg = 'text-bg-primary';
        
        switch(type) {
            case 'success':
                alertType = 'alert-success';
                textBg = 'text-bg-success';
                break;
            case 'error':
                alertType = 'alert-danger';
                textBg = 'text-bg-danger';
                break;
            case 'warning':
                alertType = 'alert-warning';
                textBg = 'text-bg-warning';
                break;
            // Add more cases as needed
        }
        var alertMessage = '<div class="alert ' + alertType + ' alert-dismissible '+textBg+' border-0 fade show" role="alert">' +
                                '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                '<strong>' + message + '</strong>' +
                            '</div>';

        this.html('');
        this.append(alertMessage);
    };
})(jQuery);


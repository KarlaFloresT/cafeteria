import $ from 'jquery';
import whatInput from 'what-input';

window.$ = $;
import swal from 'sweetalert2/dist/sweetalert2.all.min.js';

import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
//import './lib/foundation-explicit-pieces';


$(document).foundation();

$('#formulario')
    .on("invalid.zf.abide", function(ev, elem) {
        swal(
            'Error!',
            'El formulario se ha enviado incompleto',
            'error'
        );
    })
    .on("formvalid.zf.abide", function(ev, frm) {
        var formulario = $(this);
        $.ajax({
            type: formulario.attr('method'),
            url: formulario.attr('action'),
            data: formulario.serialize(),
            success: function(data){
                var resultado = data;
                var respuesta = JSON.parse(resultado);
                console.log(respuesta);
                swal(
                    respuesta.mensaje,
                    'Tú reservación '+ respuesta.nombre +' ha sido enviada con éxito.',
                    'success'
                );
            }
        });
        
    })
    .on("submit", function(ev){
        ev.preventDefault();
        console.log("Submit for from id "+ev.target.id+" intercepted");
    });
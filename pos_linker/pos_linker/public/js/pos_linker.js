// ERPNext connector for thermal printer
// author: OLSA, Oluic Sasa
// support: http://olsa.me
// version: 1.0
// date: 10.2017.
console.log("Evo me u linkeru");
erpnext.pos.PointOfSale.prototype.make_payment_modal = function(){
        this.payment = new Payment({
                frm: this.frm,
                events: {
                        submit_form: () => {                                
                                $.ajax({
                                    type: "POST",
                                    crossDomain: true,                                    
                                    headers : {"Content-Type" : "application/x-www-form-urlencoded; charset=UTF-8"},
                                    url: "http://127.0.0.1/pos/index.php",			
                                    //data: JSON.stringify({args:JSON.stringify(this.frm.doc),cmd:"print_receipe_to_local"}),  
                                    data: JSON.stringify(this.frm.doc),
                                    contentType: "application/json; charset=utf-8",
                                    dataType: "json",
                                    success: function( msg ) {
                                    console.log( "OK" );
                                    }
                                });
                                this.submit_sales_invoice();
                        }
                }
        });       
}
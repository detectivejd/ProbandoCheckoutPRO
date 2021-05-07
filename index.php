<html>
    <head>
        <title>Probando link de pago de mercado pago</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <style>
            #main {
                margin: 10px 10px 10px 10px;
            }
        </style>
        <div id="main">
            <form action="procesar.php" method="post" name="frmaccion">
                <div class="row mt">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="showback">
                            <h4><i class="fa fa-angle-right"><i class="fa fa-angle-right"></i></i>&nbsp;Ingreso de datos:</h4>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input name="txtnombre" type="text" class="form-control" placeholder="Nombre del Artículo" required="required" tabindex="1" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input name="txtmonto" type="text" class="form-control" placeholder="Monto" required="required" tabindex="2"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row text-center justify-content-center">
                                    <button type="submit" name="btnpagar" class="btn btn-info" tabindex="3">
                                        Pagar
                                    </button>
                                    &nbsp;
                                    <button type="submit" name="btnlink" class="btn btn-info" tabindex="4">
                                        Link
                                    </button>                                 
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>
            </form>
            <a href="https://api.mercadopago.com/v1/payments/86aa7bb4-3099-42bb-aaa8-93605bef9056">
                <button name="btnpagos" class="btn btn-info" tabindex="4">
                    Ver pagos
                </button>
            </a> 
        </div>
    </body>    
</html>
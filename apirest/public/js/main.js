var app = angular.module("App", [], function ($interpolateProvider) {
     /*cambiando los  corchetes de angular por esto para no entrar en conflicto con los blade de laravel*/
    $interpolateProvider.startSymbol('<{');
    $interpolateProvider.endSymbol('}>');
})

//var urlglobal="http://localhost/apirest/public/"
var urlglobal="http://localhost:8000/"
app.controller("Ctroller", function ($scope, $http) {



$scope.show = function () {
        var url = urlglobal+"show";
        $http.get(url)
                .then(function (response) {

                    $scope.usuarios = response.data;
                     console.log(response.data)
                    angular.element(document).ready(function () {
                        dTable = $('#user_table')        //agregando la  paginacion  de  datables  de jquery   botstrap
                        dTable.DataTable();

                    });
                });

    }

  
    $('#cedula').on('input', function (e) {
        if (!/^[ 0-9]*$/i.test(this.value)) {
            alert("el campo cedula solo  permite numeros ")
            this.value = this.value.replace(/[^ 0-9]+/ig, "");
        }
    })



    $('#telefono').on('input', function (e) {
        if (!/^[ 0-9]*$/i.test(this.value)) {
            alert("el campo telefono solo permite numeros ")
            this.value = this.value.replace(/[^ 0-9]+/ig, "");
        }
    })

 
    $scope.CrearUsuario = function () {
      
        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        if (!regex.test($("#correo").val().trim())) {
            alert(" correo no valido");

            return  false;
        }
       
        
        if ($("#nombres").val() == "") {
            alert('el campo nombres es requerido')
            return false;
        }
        if ($("#apellidos").val() == "") {
            alert('el campo apellidos es requerido')
            return  false;
        }
        if ($("#cedula").val() == "") {
            alert('el campo cedula  es requerido ')
            return  false;
        }
        if ($("#correo").val() == "") {
            alert('el campo correo  es requerido')
            return  false;
        }
        if ($("#telefono").val() == "") {
            alert('el campo telefono  es requerido')
            return false;
        }
         
       



        var url = urlglobal + "create" 
        var parametros = $("#registrarUsuarios").serialize();  
        $http({
            method: 'POST',
            url: url,
            data: parametros, 
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}    

            
        }).success(function (response) {
            alert(response);

            $('#registrarUsuarios')[0].reset();  
            dTable = $('#user_table') 
            var table = dTable.DataTable();
            table.destroy();   
            $scope.show() 
        })
    }


    $scope.edit = function (id) {


        var url = urlglobal + "edit"
        var parametros = $.param({"id": id});   
        $http({
            method: 'POST',
            url: url,
            data: parametros, 
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}

            
        }).success(function (response) {


            $("#contenido").html(response);  
            $("#myModal2").modal();   

            $('#cedula2').on('input', function (e) {   
                if (!/^[ 0-9]*$/i.test(this.value)) {
                    alert("el campo cedula solo permite numeros ")
                    this.value = this.value.replace(/[^ 0-9]+/ig, "");
                }
            })

            $('#telefono2').on('input', function (e) {
                if (!/^[ 0-9]*$/i.test(this.value)) {
                    alert("   el campo telefono  solo  permite numeros ")
                    this.value = this.value.replace(/[^ 0-9]+/ig, "");
                }
            })
        })


    }
      
    $scope.update = function () {

        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        if (!regex.test($("#correo2").val().trim())) {
            alert(" correo no valido");

            return  false;
        }


        if ($("#nombres2").val() == "") {
            alert('el campo nombres es requerido')
            return false;
        }
        if ($("#apellidos2").val() == "") {
            alert('el campo apellidos es requerido')
            return  false;
        }
        if ($("#cedula2").val() == "") {
            alert('el campo cedula  es requerido ')
            return  false;
        }
        if ($("#correo2").val() == "") {
            alert('el campo correo  es requerido')
            return  false;
        }
        if ($("#telefono2").val() == "") {
            alert('el campo telefono  es requerido')
            return false;
        }


        var url = urlglobal + "update"
        var parametros = $("#UpdateUser").serialize();
        $http({
            method: 'POST',
            url: url,
            data: parametros, 
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}

            
        }).success(function (response) {
            alert(response);
            dTable = $('#user_table')
            var table = dTable.DataTable();
            table.destroy();
            $scope.show();
       
        })

    }




    $scope.delete = function (id) {
         var txt;
        var url = urlglobal+"delete ";
        var r = confirm("desea eliminar el registro!");   
        if (r == true) {
            var parametros = $.param({"id": id});  
        } else {
            txt = "";   
            return false;
        }
        $http({
            method: 'POST',
            url: url,
            data: parametros, 
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}  
        }).success(function (response) {
            alert(response);
           dTable = $('#user_table')
            var table = dTable.DataTable();
            table.destroy();
            $scope.show(); 
            
        })
       
    }





    $scope.show(); 



})
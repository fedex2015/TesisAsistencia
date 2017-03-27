angular.module('app').controller('listadoController', ['$scope','$http','$routeParams','$rootScope', function ($scope, $http, $routeParams,$rootScope, ngTableParams, $filter){
	$scope.goBack = function()
	{
		$rootScope.materia = '';
		id_doc = $routeParams.id_doc;
		location.hash = "#/materias/"+id_doc;
	}
	$scope.goSave = function(){
		alumnos = $scope.$parent.$$childHead.listado;
		var longitud = alumnos.length;
		$scope.arr = [];
		angular.forEach(alumnos, function(value, key) {
			if(!angular.isUndefined(value.view))
			$scope.arr.push('{"falta":"'+ value.view + '","id_alumno":"' + value.id_alumno+'"}');
		});
		
		//Validacion que se seleccionen para todos los alumnos su falta.
		if (longitud != $scope.arr.length && alumnos[0].estado_curso == null){
			alert('Por favor seleccione la falta para todos los alumnos');
			return false;
		}	

		result = angular.toJson($scope.arr);
		result = JSON.parse(result);	

		var successBackend = function(data, status, headers, config){
			$scope.getListadoA();
			alert('Asistencia Guardada Exitosamente');
		};
		var errorBackend = function(data, status, headers, config){
		};
	
		id_cur = $routeParams.result;      // Parametros de entrada de guardarAsistencia.php
		id_doc= $routeParams.id_doc;
		estado_curso = $rootScope.estado_curso;
		$http({ method: 'POST',
		url: 'http://tesisasistencia.esy.es/guardarAsistencia.php',
		data: {'id_curso':id_cur,'id_docente':id_doc,'estado_curso':estado_curso,'data':result}})
		.success(successBackend) 
		.error(errorBackend); 

	}
	
	$scope.goConfirm = function(){
		alumnos = $scope.$parent.$$childHead.listado;
		$scope.arr = [];
		var longitud = alumnos.length;
		angular.forEach(alumnos, function(value, key) {
			//Controlar que el docente cargue la asistencia para todos los alumnos.
			if (value.view != '0' && value.view != '1' && value.view != '2'){
				flag = 1;				
			}
			if(!angular.isUndefined(value.view))
			$scope.arr.push('{"falta":"'+ value.view + '","id_alumno":"' + value.id_alumno+'"}');
		});	
		//Validacion que se seleccionen para todos los alumnos su falta.
		if (longitud != $scope.arr.length && alumnos[0].estado_curso == null){
			alert('Por favor seleccione la falta para todos los alumnos');
			return false;
		}
		result = angular.toJson($scope.arr);
		result = JSON.parse(result);	

		var successBackend = function(data, status, headers, config){
			$scope.getListadoA();
			$scope.listado = '';
			alumnos = null;
			alert('Asistencia Confirmada Exitosamente');
			$scope.goBack();
		};
		var errorBackend = function(data, status, headers, config){
		};
	
		id_cur = $routeParams.result;      // Parametros de entrada de guardarAsistencia.php
		id_doc= $routeParams.id_doc;
		estado_curso = $rootScope.estado_curso;
		$http({ method: 'POST',
		url: 'http://tesisasistencia.esy.es/confirmarAsistencia.php',
		data: {'id_curso':id_cur,'id_docente':id_doc,'estado_curso':estado_curso,'data':result}})
		.success(successBackend) 
		.error(errorBackend); 

	}
	
	$scope.getListadoA = function(){
		var successBackend = function(data, status, headers, config){
		debugger;
			if (data == 101)
			{
				alert('Aun posee cursos que se encuentran GUARDADOS, sin CONFIRMAR. Por favor, revise esta situacion e intente nuevamente.');
				$scope.goBack();
			}
			else
				if(data == 501)
				{
					$scope.listado = 0;
					$scope.listado.dataI = 501;
					alert('Este curso no tiene alumnos inscriptos. Presione regresar para seleccionar otra materia.');
				}	
				else
				{
					$scope.listado = '';
					$scope.listado = data;
					$scope.listado.materia = $rootScope.materia;
					$scope.listado.dataI = 200;
					$rootScope.estado_curso = data[0].estado_curso;
				}
		};
		var errorBackend = function(data, status, headers, config){
		};
		id_cur = $routeParams.result;
		id_doc = $routeParams.id_doc;
		$http({ method: 'GET',
			url: 'http://tesisasistencia.esy.es/obtenerInscriptos.php?id_curso='+id_cur+'&id_docente='+id_doc})
			.success(successBackend)
			.error(errorBackend); 
	}
	$scope.getListadoA(); 
}]);

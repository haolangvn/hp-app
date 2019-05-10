zaa.directive("ecommerceAttributes", function() {
	return {
		restrict: "E",
		scope: {
			'model' : '=',
			'product' : '='
		},
		controller: ['$scope', '$http', function($scope, $http) {
			
			$scope.$watch('product', function(n, o) {
				if (n != null && n) {
					$scope.getItemAttributesData(n);
				}
			});
			
			$scope.$watch('model', function(n, o) {
				if (angular.isArray(n) || n == undefined) {
					$scope.model = {};
				}
			});
			
			$scope.getItemAttributesData = function(id) {
				$http.get('admin/api-ecommerce-product/attributes?id=' + id).then(function(r) {
					$scope.data = r.data;
				});
			};
			
		}],
		templateUrl: 'ecomadmin/item/item-attributes'
	}
});
zaa.directive("myDirective", function () {
    return {
        restrict: "E",
        scope: {
            'model': '=',
            'data': '='
        },
        controller: ['$scope', '$http', function ($scope, $http) {

                var a = [{1: 123, 2: 456}];
                $scope.$watch('data', function (n, o) {
                    if (n != null && n) {
                        console.log(n);
//                        console.log(o);
//                        $scope.getArticleAttributesData(n);
                    }
                });

                $scope.$watch('model', function (n, o) {
                    if (angular.isArray(n) || n == undefined) {
                        $scope.model = {};
                    }
                });
//                $scope.$watch(function () {
//                    console.log($scope.data);
//                    return $scope.data;
//                }, function (n, o) {
//                    console.log(n, o);
//                });
//                console.log($scope.data);
//                $scope.$watch('model', function (n, o) {
//                    console.log($model);
//                    return $scope.model;
//                });

//			$scope.getArticleAttributesData = function(id) {
//				$http.get('admin/api-ecommerce-product/attributes?id=' + id).then(function(r) {
//					$scope.data = r.data;
//				});
//			};

            }],
        template: function () {
            return '<zaa-select initvalue="{{data.r1}}"></zaa-select>';
//            return '<zaa-select initvalue="{{data.r1}}" ng-repeat="item in data.r1"><zaa-injector dir="zaa-text" options="" fieldid="{{item.id}}" fieldname="{{item.id}}" label="{{item.name}}" model="model[item.id]"></zaa-injector></div>';
//            return '<zaa-injector dir="zaa-select" options="data.r1" fieldid="parent_id" fieldname="parent_id" label="parent_id""></zaa-injector>';
//            return '<div ng-repeat="attr in item.attributes"><zaa-injector dir="attr.input" options="attr.values_json" fieldid="{{attr.id}}_{{item.set.id}}" fieldname="{{attr.id}}_{{item.set.id}}" label="{{attr.name}}" model="model[item.set.id][attr.id]"></zaa-injector></div>';
//            return '<div ng-repeat="item in data.r1"><option>{{item.name}}</option></div>';
        }
    }
});

//zaa.directive("my-directive", function () {
//    return {
//        restrict: "E",
//        scope: {
//            'model': '=',
//            'data': '=',
//        },
//        controller: function ($scope, $filter) {
//            $scope.$watch(function () {
//                return $scope.model
//            }, function (n, o) {
//                console.log(n, o);
//            });
//        },
//        template: function () {
//            return '<div>Use data and model as they are assigned trough scope defintion: <input type="text" ng-model="model" /></div>';
//        }
//    }
//});

//zaa.directive("ecommerceAttributes", function() {
//	return {
//		restrict: "E",
//		scope: {
//			'model' : '=',
//			'product' : '='
//		},
//		controller: ['$scope', '$http', function($scope, $http) {
//			
//			$scope.$watch('product', function(n, o) {
//				if (n != null && n) {
//					$scope.getArticleAttributesData(n);
//				}
//			});
//			
//			$scope.$watch('model', function(n, o) {
//				if (angular.isArray(n) || n == undefined) {
//					$scope.model = {};
//				}
//			});
//			
//			$scope.getArticleAttributesData = function(id) {
//				$http.get('admin/api-ecommerce-product/attributes?id=' + id).then(function(r) {
//					$scope.data = r.data;
//				});
//			};
//			
//		}],
//		templateUrl: 'ecommerceadmin/article/article-attributes'
//	}
//});
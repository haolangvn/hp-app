<script>
    zaa.bootstrap.register('MyController', ['$scope', '$http', function ($scope, $http) {

            $scope.dataResponse;

            $scope.click = function () {
                $http.get('demoadmin/finder/data').then(function (response) {
                    console.log(response.data);
                    $scope.dataResponse = response.data;
                });
            };

            $scope.sinhvien = {
                ho: "Tran Minh",
                ten: "Chinh",
                hocphi: 200,
                tenMonHoc: [
                    {ten: 'Vat Ly Dai Cuong', diemthi: 7.5},
                    {ten: 'Triet Hoc', diemthi: 8.0},
                    {ten: 'Toan', diemthi: 8.5}
                ],
                hoten: function () {
                    var doituongsinhvien;
                    doituongsinhvien = $scope.sinhvien;
                    return doituongsinhvien.ho + " " + doituongsinhvien.ten;
                }
            };

        }]);
</script>
<div class="luya-content" ng-controller="MyController">
    <h1>My Custom View</h1>

    <button type="button" ng-click="click()" class="btn btn-primary">Click me</button>
    <div>{{dataResponse}}</div>
    <div ng-if="dataResponse">
        The time is: 
    </div>
    
</div>
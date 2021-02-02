var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
//giống bản vẽ nháp, mô tả tính năng của class
var DienThoai = /** @class */ (function () {
    function DienThoai() {
    }
    return DienThoai;
}());
//chính xác hóa nó bằng tạo class sủ dụng lại bản thiết kế abstract
var android = /** @class */ (function (_super) {
    __extends(android, _super);
    function android() {
        return _super !== null && _super.apply(this, arguments) || this;
    }
    android.prototype.guitinnhan = function () {
        console.log('Gửi tin nhắn trong Android');
    };
    android.prototype.goidienthoai = function () {
        return 'Gọi điện thoại';
    };
    return android;
}(DienThoai));
var samsung = new android();
samsung.guitinnhan();
console.log(samsung.goidienthoai());

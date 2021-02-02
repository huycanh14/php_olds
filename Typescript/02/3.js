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
var khoahoc = /** @class */ (function () {
    function khoahoc(id, ten, dodai) {
        this.id = id;
        this.ten = ten;
        this.dodai = dodai;
    }
    //Method
    khoahoc.prototype.xemkhoahoc = function () {
        console.log(this.ten);
        console.log("\n\t\t\tID kh\u00F3a h\u1ECDc l\u00E0: " + this.id + ",\n\t\t\tT\u00EAn kh\u00F3a h\u1ECDc l\u00E0: " + this.ten + ",\n\t\t\t\u0110\u1ED9 d\u00E0i: " + this.dodai + " ti\u1EBFng\n\t\t\t");
    };
    return khoahoc;
}());
var khoahoclaptrinh = /** @class */ (function (_super) {
    __extends(khoahoclaptrinh, _super);
    function khoahoclaptrinh(id, ten, dodai, filedinhkem) {
        var _this = _super.call(this, id, ten, dodai) || this;
        _this.filedinhkem = filedinhkem;
        return _this;
    }
    //Method
    khoahoclaptrinh.prototype.xemkhoahoc = function () {
        _super.prototype.xemkhoahoc.call(this);
        console.log('File đính kèm: ' + this.filedinhkem);
    };
    khoahoclaptrinh.prototype.test1 = function () {
        console.log(this.ten);
    };
    return khoahoclaptrinh;
}(khoahoc));
//test public
var khoa08 = new khoahoc(8, 'Học làm banner', 6);
console.log(khoa08.ten); //bên ngoài class
khoa08.xemkhoahoc();
var khoa09 = new khoahoclaptrinh(09, 'Học sử dụng bootstrap', 13, 'a.zip');
console.log(khoa09.ten);
khoa09.test1();

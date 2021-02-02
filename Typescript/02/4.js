var hero = /** @class */ (function () {
    function hero(_ten) {
        this._ten = _ten;
    }
    Object.defineProperty(hero.prototype, "ten", {
        get: function () {
            return this._ten;
        },
        set: function (v) {
            this._ten = v;
        },
        enumerable: true,
        configurable: true
    });
    return hero;
}());
var zeus = new hero('Zeus');
console.log('Tên tướng là: ' + zeus.ten);
zeus.ten = "Thần Zeus";
console.log('Tên tướng là: ' + zeus.ten);

define([
    'uiComponent',
    'Magento_Customer/js/customer-data'
], function (Component, customerData) {
    'use strict';

    return Component.extend({
        /** @inheritdoc */
        initialize: function () {
            this._super();
            this.emisection = customerData.get('emisection');
            var data = this.data;
            var price= this.price;
            var gender= this.emisection().gender;
            // console.log(data,'abcd');
            // console.log(price,'abc');
            // console.log(gender,'abc');
            var plan=[];
            for (var i=0; i<data.length; i++) {
                if (data[i].gender===gender) {
                    var Si = price * data[i].tenure * data[i].interest_rate;
                    var intr = Si/1200;
                    var totalprice = Number(price)+Number(intr);
                    var monthprice = totalprice/ data[i].tenure;
                    plan.push({emiplan:'₹'+ monthprice.toFixed(2)+'x'+data[i].tenure+'m',interest: '₹'+intr+'('+ data[i].interest_rate+'%)', totalprice: '₹'+totalprice});
                }
            }
            console.log(plan,'xyz');
            plan.forEach(res => {
                var row = document.createElement("tr");
                row.className = "row-value";
                Object.values(res).map(value => {
                        var col = document.createElement("td");
                        col.innerText = value;
                        row.appendChild(col)
                })
                document.getElementById("emi").appendChild(row)
            })
        }
    });
});


(function(jsGrid, $, undefined) {

    var TextField = jsGrid.TextField;

    function NumberField(config) {
        
        //this.name = "";
        this.name=config.name;
        TextField.call(this, config);
    }

    NumberField.prototype = new TextField({
        //id:config[],
        sorter: "number",
        align: "right",
		readOnly: false,

        filterValue: function() {
            return this.filterControl.val()
                ? parseInt(this.filterControl.val() || 0, 10)
                : undefined;
        },

        insertValue: function() {
            return this.insertControl.val()
                ? parseInt(this.insertControl.val() || 0, 10)
                : undefined;
        },

        editValue: function() {
            return this.editControl.val()
                ? parseInt(this.editControl.val() || 0, 10)
                : undefined;
        },

        _createTextBox: function() {
			return $("<input>").attr("type", "number").attr("id", this.name)
                .prop("readonly", !!this.readOnly);
        }
    });

    jsGrid.fields.number = jsGrid.NumberField = NumberField;

}(jsGrid, jQuery));

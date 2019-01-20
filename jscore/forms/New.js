Ext.define('Swan.forms.New', {
    extend: 'Ext.window.Window',
    title: 'Добавить книгу',
    // height: 650,
    // width: 400,
    items: [
        Ext.create('Ext.form.Panel', {
            renderTo: document.body,
            bodyPadding: 10,
            url: 'books/new',
            defaultType: 'textfield',
            layout: 'anchor',
            items: [
                {
                    fieldLabel: 'Автор',
                    name: 'author_name'
                },
                {
                    fieldLabel: 'Название книги',
                    name: 'book_name'
                },
                {
                    xtype: 'datefield',
                    fieldLabel: 'Год издания',
                    name: 'book_year'
                }
            ],
            buttons: [
                {
                    text: 'Submit',
                    handler: function() {
                        const form = this.up('form'); // get the form panel
                        
                        if (form.isValid()) { // make sure the form contains valid data before submitting
                            form.submit({
                                success: function(form, action) {
                                    
                                   Ext.Msg.alert('Success', action.result);
                                },
                                failure: function(form, action) {
                                    console.log(form, action);
                                    Ext.Msg.alert('Failed', action.result.msg);
                                }
                            });
                        } else { // display error alert if the data is invalid
                            Ext.Msg.alert('Invalid Data', 'Please correct form errors.')
                        }
                    }
                }
            ]
        }),
    ]
});
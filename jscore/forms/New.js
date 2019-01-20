Ext.define('Swan.forms.New', {
    extend: 'Ext.window.Window',
    title: 'Добавить книгу',
    closeAction: 'method-hide',
    width: 400,
    items: [
        Ext.create('Ext.form.Panel', {
            renderTo: document.body,
            bodyPadding: 10,
            url: 'books/new',
            defaultType: 'textfield',
            items: [
                {
                    fieldLabel: 'Автор',
                    name: 'author_name',
                    width: '100%',
                },
                {
                    fieldLabel: 'Название книги',
                    name: 'book_name',
                    width: '100%'
                },
                {
                    xtype: 'numberfield',
                    fieldLabel: 'Год издания',
                    name: 'book_year',
                    width: '100%',
                    minValue: 1,
                    maxValue: 2500,
                    msgTarget: 'under',
                }
            ],
            buttons: [
                {
                    text: 'Submit',
                    handler: function() {
                        console.log(main);
                        const form = this.up('form');
                        const window = form.up('window');
                            form.submit({
                                success: function(action) {
                                    Ext.Msg.alert('Success');
                                window.close();

                                },
                                failure: function(action) {
                                    Ext.Msg.alert('Failed');
                                }
                            });
                            
                    }
                }
            ]
        }),
    ]
});
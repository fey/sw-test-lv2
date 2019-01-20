/**
 * Список книг
 */
Ext.define('Swan.view.Books', {
	extend: 'Ext.grid.Panel',
	store: {
		proxy: {
			type: 'ajax',
			url: 'books',
			reader: {
				type: 'json',
				idProperty: 'book_id'
			}
		},
		autoLoad: true,
		remoteSort: false,
		sorters: [{
			property: 'name',
			direction: 'ASC'
		}]
	},
	defaultListenerScope: true,
	tbar: [{
		text: 'Добавить',
		handler: function() {
			// todo надо реализовать добавление
			Ext.create('Ext.window.Window', {
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
			}).show();
		}
	}, {
		text: 'Редактировать',
		handler: function () {
			// todo надо реализовать редактирование
			console.error(this.text);
			Ext.Msg.alert('В разработке', 'Данный функционал ещё не реализован');
		}
	}, {
		text: 'Удалить',
		handler: function() {
			// todo надо реализовать удаление
			Ext.Msg.alert('В разработке', 'Данный функционал ещё не реализован');
		}
	}, {
		text: 'Экспорт в XML',
		handler: function() {
			// todo надо реализовать удаление
			Ext.Msg.alert('В разработке', 'Данный функционал ещё не реализован');
		}
	}],
	columns: [{
		dataIndex: 'author_name',
		text: 'Автор',
		width: 150
	}, {
		dataIndex: 'book_name',
		text: 'Название книги',
		flex: 1
	}, {
		dataIndex: 'book_year',
		text: 'Год издания',
		width: 150
	}]
});
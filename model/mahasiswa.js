// app.js
// Define the Mahasiswa model
var Mahasiswa = Backbone.Model.extend({
    urlRoot: '../api/mahasiswa_api.php' // Specify the URL for your API
});

// Define the Mahasiswa collection
var MahasiswaCollection = Backbone.Collection.extend({
    model: Mahasiswa,
    url: '../api/mahasiswa_api.php'
});

// Create a new collection instance
var mahasiswaCollection = new MahasiswaCollection();

// Define the Mahasiswa View
var MahasiswaView = Backbone.View.extend({
    tagName: 'tr',
    template: _.template('<td><%= nim %></td><td><%= nama %></td><td><%= jk %></td><td><%= prodi %></td><td><a id="edit-mahasiswa-button" class="btn btn-primary" href="edit.php?id=<%= id %>">Edit</a>&nbsp;<a id="delete-mahasiswa-button" class="btn btn-danger" href="deleteform.php?id=<%= id %>">Delete</a></td>'),

    initialize: function () {
        this.render();
    },

    render: function () {
        this.$el.html(this.template(this.model.toJSON()));
        return this;
    }
});

// Use Backbone Router to handle routes and navigation
var AppRouter = Backbone.Router.extend({
    routes: {
        'edit/:id': 'editMahasiswa',
        'update/:id': 'updateMahasiswa',
        'deleteform/:id': 'deleteformMahasiswa',
        'delete/:id': 'deleteMahasiswa'
    },

    editMahasiswa: function (id) {
        // Fetch the Mahasiswa model with the specified id
        var mahasiswa = new Mahasiswa({ id: id });
        mahasiswa.fetch({
            success: function (model, response) {
                // Redirect to the edit.php page with the data as query parameters
                var editUrl = '../mahasiswa/edit.php?' +
                    'id=' + encodeURIComponent(model.get('id'));

                window.location.href = editUrl;
            },
            error: function (model, response) {
                // Handle errors here
                console.error('Error:', response);
            }
        });
    },

    // Add a new function to handle updates
    updateMahasiswa: function (id, nim, nama, jk, prodi) {
        var data = {
            id: id,
            nim: nim,
            nama: nama,
            jk: jk,
            prodi: prodi
        };

        // Send a PUT request to update the Mahasiswa record
        $.ajax({
            url: '../mahasiswa/update.php',
            type: 'PUT', // Change the request type to POST
            data: JSON.stringify(data),
            contentType: 'application/json',
            success: function (response) {
                console.log('Record updated successfully');
                // Redirect to index.html after updating
                window.location.href = 'http://localhost/backboner/mahasiswa/index.php';
            },
            error: function (response) {
                console.error('Error:', response);
            }
        });
    },
    deleteformMahasiswa: function (id) {
        // Fetch the Mahasiswa model with the specified id
        var mahasiswa = new Mahasiswa({ id: id });
        mahasiswa.fetch({
            success: function (model, response) {
                // Redirect to the delete.php page with the data as query parameters
                var deleteUrl = '../mahasiswa/deleteform.php?' +
                    'id=' + encodeURIComponent(model.get('id'));

                window.location.href = deleteUrl;
            },
            error: function (model, response) {
                // Handle errors here
                console.error('Error:', response);
            }
        });
    },

    // Add a new function to handle updates
    deleteMahasiswa: function (id) {
        var data = {
            id: id
        };

        // Send a PUT request to update the Mahasiswa record
        $.ajax({
            url: '../mahasiswa/delete.php',
            type: 'DELETE', // Change the request type to POST
            data: JSON.stringify(data),
            contentType: 'application/json',
            success: function (response) {
                console.log('Record deleted successfully');
                // Redirect to index.html after updating
                window.location.href = 'http://localhost/backboner/mahasiswa/index.php';
            },
            error: function (response) {
                console.error('Error:', response);
            }
        });
    }
});

// Handle form submission
$('#mahasiswa-form').on('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission

    // Get form values
    var nim = $('#nim').val();
    var nama = $('#nama').val();
    var jk = $('#jk').val();
    var prodi = $('#prodi').val();

    // Create a new Mahasiswa model with the form data
    var newMahasiswa = new Mahasiswa({
        nim: nim,
        nama: nama,
        jk: jk,
        prodi: prodi
    });

    console.log("Form submitted"); // Debugging line

    // Save the new Mahasiswa model to the server
    newMahasiswa.save(null, {
        success: function (model, response) {
            // Add the new Mahasiswa to the collection and render it
            mahasiswaCollection.add(model);
            var mahasiswaView = new MahasiswaView({ model: model });
            $('#mahasiswa-table tbody').append(mahasiswaView.render().el);

            // Clear the form fields
            $('#nim').val('');
            $('#nama').val('');
            $('#jk').val('');
            $('#prodi').val('');
        },
        error: function (model, response) {
            // Handle errors here
            console.error('Error:', response);
        }
    });
});

// Attach a click event to an update button
$('#mahasiswa-edit-form').on('submit', function (e) {
    e.preventDefault(); // Prevent the default behavior of the button

    // Get the data to update
    var id = $('#id').val(); // Get the ID from the hidden input field
    var nim = $('#nim').val();
    var nama = $('#nama').val();
    var jk = $('#jk').val();
    var prodi = $('#prodi').val();

    // Call the updateMahasiswa function
    appRouter.updateMahasiswa(id, nim, nama, jk, prodi);
});

// Attach a click event to an delete button
$('#mahasiswa-delete-form').on('submit', function (e) {
    e.preventDefault(); // Prevent the default behavior of the button

    // Get the data to update
    var id = $('#id').val(); // Get the ID from the hidden input field
    
    // Call the updateMahasiswa function
    appRouter.deleteMahasiswa(id);
});

// Create an instance of the router
var appRouter = new AppRouter();

// Start Backbone history
Backbone.history.start();

// Fetch data from the server and render the table
mahasiswaCollection.fetch({
    success: function (collection) {
        collection.each(function (model) {
            var mahasiswaView = new MahasiswaView({ model: model });
            $('#mahasiswa-table tbody').append(mahasiswaView.render().el);
        });
    }
});

var $hotWordCollectionHolder;
var $pictureCollectionHolder;

var $addHWLink = $('<a href="#" class="btn btn-outline-success">Add Hot Word</a>');
var $newLinkP = $('<p class="p-hot-word"></p>').append($addHWLink);

var $addPictureLink = $('<a href="#" class="btn btn-outline-success">Add picture</a>');
var $newLinkP2 = $('<p class="p-picture"></p>').append($addPictureLink);

function addPictureDeleteLink($formP){
    var $removeForm = $('<a href="#" class="btn btn-outline-danger">Delete Picture</a>')
    $formP.append($removeForm);

    $removeForm.on('click', function(e){
        e.preventDefault();
        $formP.remove();
    })
}

function addHWDeleteLink($formP){
    var $removeForm = $('<a href="#" class="btn btn-outline-danger">Delete Hot Word</a>')
    $formP.append($removeForm);

    $removeForm.on('click', function(e){
        e.preventDefault();
        $formP.remove();
    })
}

function addPictureForm($collectionHolder, $newLink){
    var prototype = $collectionHolder.data('prototype');
    var index = $collectionHolder.data('index');
    var newForm = prototype;
    console.log('INDEX = ' + index);

    newForm = newForm.replace(/__name__/g, index);

    $collectionHolder.data('index', index + 1);
    var newFormP = $('<p></p>').append(newForm);
    $newLink.before(newFormP);
    addPictureDeleteLink(newFormP);
}

function addHotWordForm($collectionHolder, $newLink){
    var prototype = $collectionHolder.data('prototype');
    var index = $collectionHolder.data('index');
    var newForm = prototype;

    console.log('INDEX = ' + index);
    newForm = newForm.replace(/__name__/g, index);

    $collectionHolder.data('index', index + 1);
    var newFormP = $('<p></p>').append(newForm);
    $newLink.before(newFormP);
    addHWDeleteLink(newFormP);
}

$(document).ready(function(){

    // Hot Word Collection
    $hotWordCollectionHolder = $('div.hot-words');
    $hotWordCollectionHolder.append($newLinkP);
    $hotWordCollectionHolder.data('index', $hotWordCollectionHolder.find(':input').length);

    // Picture Collection
    $pictureCollectionHolder = $('div.pictures');
    $pictureCollectionHolder.append($newLinkP2);
    $pictureCollectionHolder.data('index', $pictureCollectionHolder.find(':input').length);

    $addHWLink.on('click', function(e){
        e.preventDefault();
        addHotWordForm($hotWordCollectionHolder, $newLinkP);
    });

    $addPictureLink.on('click', function(e){
        e.preventDefault();
        addPictureForm($pictureCollectionHolder, $newLinkP2);
    });

    $(".delete").click(function(){
        if (!confirm("Do you want to delete ?")){
            return false;
        }
    });
});


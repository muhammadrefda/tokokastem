@extends('layouts.master')
@section('title','custom product')
@section('content')




    <!-- Create the container of the tool -->
    <div id="tshirt-div">
        <!--
            Initially, the image will have the background tshirt that has transparency
            So we can simply update the color with CSS or JavaScript dinamically
        -->
        <img id="tshirt-backgroundpicture" src="{{asset('img/background_tshirt.png')}}"/>

        <!--
            The container where Fabric.js will work. Notice that in the the style of #canvas
            the width and height need to match with the attributes
        -->
        <div id="drawingArea" class="drawing-area">
            <div class="canvas-container">
                <canvas id="canvas" width="200" height="400"></canvas>
            </div>
        </div>
    </div>

    <!--
    The select that will allow the user to pick one of the static designs
    In our case, we only offer a single picture, namely the logo of Batman
-->
    <label for="tshirt-design">T-Shirt Design:</label>
    <select id="tshirt-design">
        <option value="">Select one of our designs ...</option>
        <option value="{{asset('img/batman.png')}}">Batman</option>
    </select>

    <!-- The Select that allows the user to change the color of the T-Shirt -->
    <label for="tshirt-color">T-Shirt Color:</label>
    <select id="tshirt-color">
        <!-- You can add any color with a new option and definings its hex code -->
        <option value="#fff">White</option>
        <option value="#000">Black</option>
        <option value="#f00">Red</option>
        <option value="#008000">Green</option>
        <option value="#ff0">Yellow</option>
    </select>

    <!-- Include Fabric.js in the page -->
    <script src="{{asset('js/dist/fabric.min.js')}}"></script>
    <script >
        // Select the canvas an make it accesible for all the snippets of this article
        let canvas = new fabric.Canvas('tshirt-canvas');

        /**
         * Method that defines a picture as background image of the canvas.
         *
         * @param {String} imageUrl      The server URL of the image that you want to load on the T-Shirt.
         *
         * @return {void} Return value description.
         */
        function updateTshirtImage(imageURL){
            // If the user doesn't pick an option of the select, clear the canvas
            if(!imageURL){
                canvas.clear();
            }

            // Create a new image that can be used in Fabric with the URL
            fabric.Image.fromURL(imageURL, function(img) {
                // Define the image as background image of the Canvas
                canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas), {
                    // Scale the image to the canvas size
                    scaleX: canvas.width / img.width,
                    scaleY: canvas.height / img.height
                });
            });
        }
    </script>

@endsection

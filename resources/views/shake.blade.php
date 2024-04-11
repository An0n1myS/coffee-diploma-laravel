@extends('layout.app')
@section('content')
    <style>
        .empty{
            height: 500px;
            background: #ef4444;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="info w-full" style="background: url('image/sublogo.jpg'); background-size: cover; background-repeat: no-repeat;">
        <br><br><br>
        <h2 class="text-white text-xl text-start w-5/6 m-auto pt-32">Make your cocktail</h2>
        <br><br>
    </div>
    <div class="flex bg-neutral-800/95 w-[100%] mb-0 pb-0">
        <div class="container mx-auto my-20 flex w-5/6">
            <div class="ingredients-list flex-1 p-8 basis-2/5">
                <h2 class="mb-6 text-[22px] text-white ">Інгредієнти</h2>
                <div class="ingredient inline-block m-2">
                    <img src="{{asset('ingredients/lime.jpg')}}" alt="Лайм" class="w-16 h-16 rounded-full cursor-grab" draggable="true">
                </div>
                <div class="ingredient inline-block m-2">
                    <img src="{{asset('ingredients/mint.jpg')}}" alt="М'ята" class="w-16 h-16 rounded-full cursor-grab" draggable="true">
                </div>
                <div class="ingredient inline-block m-2">
                    <img src="{{asset('ingredients/ginger.jpg')}}" alt="Імбир" class="w-16 h-16 rounded-full cursor-grab" draggable="true">
                </div>
                <div class="ingredient inline-block m-2">
                    <img src="{{asset('ingredients/rum.jpg')}}" alt="Ром" class="w-16 h-16 rounded-full cursor-grab" draggable="true">
                </div>
                <div class="ingredient inline-block m-2">
                    <img src="{{asset('ingredients/sugar.jpg')}}" alt="Цукор" class="w-16 h-16 rounded-full cursor-grab" draggable="true">
                </div>
                <div class="ingredient inline-block m-2">
                    <img src="{{asset('ingredients/orange.jpg')}}" alt="Апельсин" class="w-16 h-16 rounded-full cursor-grab" draggable="true">
                </div>
                <div class="ingredient inline-block m-2">
                    <img src="{{asset('ingredients/lemon.jpg')}}" alt="Лимон" class="w-16 h-16 rounded-full cursor-grab" draggable="true">
                </div>
                <div class="ingredient inline-block m-2">
                    <img src="{{asset('ingredients/milk.jpg')}}" alt="Молоко" class="w-16 h-16 rounded-full cursor-grab" draggable="true">
                </div>
                <div class="ingredient inline-block m-2">
                    <img src="{{asset('ingredients/chocolate.jpg')}}" alt="Шоколад" class="w-16 h-16 rounded-full cursor-grab" draggable="true">
                </div>
                <div class="ingredient inline-block m-2">
                    <img src="{{asset('ingredients/coffee.jpg')}}" alt="Кава" class="w-16 h-16 rounded-full cursor-grab" draggable="true">
                </div>
            </div>
            <div class="cocktail-container p-8 basis-3/5">
                <div class="cocktail flex flex-row justify-around w-full">
                    <div class="w-[260px] h-[510px] border-2 border-white rounded-b-[5rem]">
                        <div class="glass w-[250px] h-[500px] overflow-hidden border-2 border-black rounded-b-[5rem] flex flex-col justify-center items-center relative basis-2/4 ">
                            <div class="w-[100%] h-[98%] bg-white rounded-b-[2rem] p-2">
                                <div class="  ingredient-placeholder absolute w-[95%] h-[98%] rounded-b-[3rem] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 font-bold text-gray-700">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="basis-3/4 flex flex-col justify-start items-center">
                        <form action="{{route('send_cocktail')}}" method="post" class="w-4/6">
                            @csrf
                            <div class="mb-4 flex flex-col w-full">
                                <input type="hidden" id="ingredients" name="ingredients">
                                <label for="cocktail_title" class="block text-[20px] font-medium mb-2 basis-1/3 text-amber-600/70">Назва коктейлю</label>
                                <input type="text" id="cocktail_title" name="cocktail_title" class=" text-gray-500 w-full px-4 py-2 bg-black/40 border border-transparent focus:border-amber-600 focus:outline-none focus:ring-amber-200">
                            </div>
                            <br>
                            <div class="buttons flex flex-col justify-between ">
                                <button class="clear-btn bg-red-500 text-white px-4 py-2 rounded-full mb-4">Відмінити останній вибір</button>
                                <button class="reset-btn bg-yellow-500 text-white px-4 py-2 rounded-full mb-4">Почати з початку</button>
                                <button type="submit" class="publish-btn bg-blue-500 text-white px-4 py-2 rounded-full mb-4">Опублікувати</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ingredients = document.querySelectorAll('.ingredient');
        const glass = document.querySelector('.glass');
        const ingredientPlaceholder = document.querySelector('.ingredient-placeholder');

        const addedIngredients = [];

        ingredients.forEach(ingredient => {
            ingredient.addEventListener('dragstart', onDragStart);
        });

        glass.addEventListener('dragover', onDragOver);
        glass.addEventListener('drop', onDrop);

        function onDragStart(event) {
            event.dataTransfer.setData('text/plain', event.target.alt);
        }

        function onDragOver(event) {
            event.preventDefault();
        }

        function onDrop(event) {
            event.preventDefault();
            const ingredientName = event.dataTransfer.getData('text/plain');
            addedIngredients.push(ingredientName.toLowerCase());

            const ingredientDiv = document.createElement('div');
            ingredientDiv.classList.add('empty', ingredientName.toLowerCase());
            glass.appendChild(ingredientDiv);

            const bgColor = getBackgroundColor(addedIngredients);
            console.log(bgColor);
            glass.style.backgroundColor = bgColor;

            updateIngredientsInput();

        }
        function updateIngredientsInput() {
            const ingredientsInput = document.getElementById('ingredients');
            ingredientsInput.value = addedIngredients.map(ingredient => capitalizeFirstLetter(ingredient)).join(', ');

            function capitalizeFirstLetter(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }

        }
        function getBackgroundColor(ingredients) {
            const colorMap = {
                'лайм': '#00FF00',
                'м\'ята': '#008000',
                'імбир': '#FFA500',
                'ром': '#8B4513',
                'цукор': '#FFFFFF',
                'апельсин': '#FFA500',
                'лимон': '#FFFF00',
                'молоко': '#FFFFFF',
                'шоколад': '#8B4513',
                'кава': '#A52A2A'
            };

            console.log('Color Map:', colorMap);
            console.log('Added Ingredients:', addedIngredients);

            const ingredientColors = ingredients.map(ingredient => colorMap[ingredient]).filter(color => color);

            if (ingredientColors.length === 0) {
                return '#FFFFFF';
            }

            const blendedColor = blendColors(ingredientColors);

            return blendedColor;
        }

        function blendColors(colors) {
            const totalColors = colors.length;

            const separatedColors = colors.map(color => {
                return {
                    r: parseInt(color.substring(1, 3), 16),
                    g: parseInt(color.substring(3, 5), 16),
                    b: parseInt(color.substring(5, 7), 16)
                };
            });

            const sumColor = separatedColors.reduce((acc, color) => {
                acc.r += color.r;
                acc.g += color.g;
                acc.b += color.b;
                return acc;
            }, { r: 0, g: 0, b: 0 });

            const blendedColor = {
                r: Math.round(sumColor.r / totalColors),
                g: Math.round(sumColor.g / totalColors),
                b: Math.round(sumColor.b / totalColors)
            };

            return rgbToHex(blendedColor.r, blendedColor.g, blendedColor.b);
        }

        function rgbToHex(r, g, b) {
            const toHex = val => {
                const hex = val.toString(16);
                return hex.length === 1 ? '0' + hex : hex;
            };

            return `#${toHex(r)}${toHex(g)}${toHex(b)}`;
        }

        const clearBtn = document.querySelector('.clear-btn');
        const resetBtn = document.querySelector('.reset-btn');
        const confirmBtn = document.querySelector('.confirm-btn');
        const publishBtn = document.querySelector('.publish-btn');

        clearBtn.addEventListener('click', undoLastChoice);

        resetBtn.addEventListener('click', restartPage);

        function undoLastChoice() {
            const ingredients = document.querySelectorAll('.ingredient');
            const lastIngredient = addedIngredients.pop();
            const lastIngredientDiv = document.querySelector(`.${lastIngredient}`);

            if (lastIngredientDiv) {
                lastIngredientDiv.remove();
            }

            const bgColor = getBackgroundColor(addedIngredients);
            glass.style.backgroundColor = bgColor;
        }

        function restartPage() {
            location.reload();
        }

    </script>



@endsection

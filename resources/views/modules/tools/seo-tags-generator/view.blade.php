<section x-data="window.bitflanSEOTagsGeneratorComponent()">
    <div class="form-group">
        <label class="custom-label">{{ trans('webtools/tools/seo-tags-generator.label') }}</label>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <input x-model="title" type="text" class="custom-input" placeholder="Title">
            </div>
            <div class="form-group">
                <input x-model="websiteName" type="text" class="custom-input" placeholder="Site Name">
            </div>
            <div class="form-group">
                <input x-model="websiteUrl" type="text" class="custom-input" placeholder="Site URL">
            </div>
    
            <div class="form-group">
                <select x-model="websiteType" class="form-select custom-input" id="websiteType">
                    <option selected disabled>Type</option>
                    <option value="article">Article</option>
                    <option value="book">Book</option>
                    <option value="books.author">Book Author</option>
                    <option value="books.genre">Book Genre</option>
                    <option value="business.business">Business</option>
                    <option value="fitness.course">Fitness Course</option>
                    <option value="music.album">Music Album</option>
                    <option value="music.musician">Music Musician</option>
                    <option value="music.playlist">Music Playlist</option>
                    <option value="music.radio_station">Music Radio Station</option>
                    <option value="music.song">Music Song</option>
                    <option value="object">Object (Generic Object)</option>
                    <option value="place">Place</option>
                    <option value="product">Product</option>
                    <option value="product.group">Product Group</option>
                    <option value="product.item">Product Item</option>
                    <option value="profile">Profile</option>
                    <option value="quick_election.election">Election</option>
                    <option value="restaurant">Restaurant</option>
                    <option value="restaurant.menu">Restaurant Menu</option>
                    <option value="restaurant.menu_item">Restaurant Menu Item</option>
                    <option value="restaurant.menu_section">Restaurant Menu Section</option>
                    <option value="video.episode">Video Episode</option>
                    <option value="video.movie">Video Movie</option>
                    <option value="video.tv_show">Video TV Show</option>
                    <option value="video.other">Video Other</option>
                    <option value="website">Website</option>
                </select>
            </div>
            <div class="form-group">
                <input x-model="imageUrl" type="text" class="custom-input" placeholder="Image URL">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <textarea x-model="description" name="" class="rounded custom-textarea" rows="8" placeholder="Description"></textarea>
            </div>
        </div>
    </div>
    <button x-on:click="generate()" class="btn custom--btn button__lg">{{ trans('webtools/tools/seo-tags-generator.submit') }}</button>

    <hr>

    <div class="form-group position-relative">
        <button @click="window.writeClipboardText($event, editor.getCode())" class="btn custom--btn button__md ace-copy-btn btn__dark">Copy</button>
        <div id="editor" x-ref="editor"></div>
    </div>
</section>
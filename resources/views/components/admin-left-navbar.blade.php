
<!--------------------POSTS-------------------->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePosts" aria-expanded="true" aria-controls="collapsePosts">
        <i class="fas fa-fw fa-cog"></i>
        <span>Posts</span>
    </a>
    <div id="collapsePosts" class="collapse" aria-labelledby="headingPosts" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Post Components:</h6>
        <a class="collapse-item" href="{{ route('admin.posts.index') }}">View Posts</a>
        <a class="collapse-item" href="{{ route('admin.posts.create') }}">Create Post</a>
        </div>
    </div>
</li>
<!--------------------USERS-------------------->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
        <i class="fas fa-fw fa-cog"></i>
        <span>Users</span>
    </a>
    <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User Components:</h6>
            <a class="collapse-item" href="{{ route('admin.users.index') }}">View Users</a>
        </div>
    </div>
</li>
<!--------------------CONCERTS-------------------->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConcerts" aria-expanded="true" aria-controls="collapseConcerts">
        <i class="fas fa-fw fa-cog"></i>
        <span>Concerts</span>
    </a>
    <div id="collapseConcerts" class="collapse" aria-labelledby="headingConcerts" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Concert Components:</h6>
            <a class="collapse-item" href="{{ route('admin.concerts.create') }}">Create Concert</a>
            <a class="collapse-item" href="{{ route('admin.concerts.index') }}">View Concerts</a>
        </div>
    </div>
</li>
<!--------------------MEDIA-------------------->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMedia" aria-expanded="true" aria-controls="collapseMedia">
        <i class="fas fa-fw fa-cog"></i>
        <span>Media</span>
    </a>
    <div id="collapseMedia" class="collapse" aria-labelledby="headingMedia" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Media Components:</h6>
            <a class="collapse-item" href="{{ route('admin.media.edit',1) }}">Edit Media Page</a>
        </div>
    </div>
</li>
<!--------------------COMMENTS-------------------->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComments" aria-expanded="true" aria-controls="collapseComments">
        <i class="fas fa-fw fa-cog"></i>
        <span>Comments</span>
    </a>
    <div id="collapseComments" class="collapse" aria-labelledby="headingComments" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Comments Components:</h6>
            <a class="collapse-item" href="{{ route('admin.comments.index') }}">Comments Page</a>
        </div>
    </div>
</li>
<!--------------------REPLIES-------------------->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReplies" aria-expanded="true" aria-controls="collapseReplies">
        <i class="fas fa-fw fa-cog"></i>
        <span>Replies</span>
    </a>
    <div id="collapseReplies" class="collapse" aria-labelledby="headingReplies" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Replies Components:</h6>
            <a class="collapse-item" href="{{ route('admin.replies.index') }}">Replies Page</a>
        </div>
    </div>
</li>
<!--------------------AUTHORIZATION-------------------->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAuthorizations" aria-expanded="true" aria-controls="collapseAuthorizations">
        <i class="fas fa-fw fa-cog"></i>
        <span>Authorizations</span>
    </a>
    <div id="collapseAuthorizations" class="collapse" aria-labelledby="headingAuthorizations" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Authorization Components:</h6>
            <a class="collapse-item" href="{{ route('admin.roles.index') }}">Roles</a>
            <a class="collapse-item" href="{{ route('admin.permissions.index') }}">Permissions</a>
        </div>
    </div>
</li>



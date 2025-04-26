<li class="{{ Request::is('tests*') ? 'active' : '' }}">
    <a href="{{ route('tests.index') }}"><i class="fa fa-edit"></i><span>Tests</span></a>
</li>


<li class="nav-item">
    <a href="{{ route('accounts.index') }}"
       class="nav-link {{ Request::is('accounts*') ? 'active' : '' }}">
        <p>Accounts</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('messages.index') }}"
       class="nav-link {{ Request::is('messages*') ? 'active' : '' }}">
        <p>Messages</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('messageLogs.index') }}"
       class="nav-link {{ Request::is('messageLogs*') ? 'active' : '' }}">
        <p>Message Logs</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('replies.index') }}"
       class="nav-link {{ Request::is('replies*') ? 'active' : '' }}">
        <p>Replies</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('reads.index') }}"
       class="nav-link {{ Request::is('reads*') ? 'active' : '' }}">
        <p>Reads</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('files.index') }}"
       class="nav-link {{ Request::is('files*') ? 'active' : '' }}">
        <p>Files</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('projects.index') }}"
       class="nav-link {{ Request::is('projects*') ? 'active' : '' }}">
        <p>Projects</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('uploads.index') }}"
       class="nav-link {{ Request::is('uploads*') ? 'active' : '' }}">
        <p>Uploads</p>
    </a>
</li>



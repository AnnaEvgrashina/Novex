<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container7vxR8pM\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container7vxR8pM/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container7vxR8pM.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container7vxR8pM\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container7vxR8pM\App_KernelDevDebugContainer([
    'container.build_hash' => '7vxR8pM',
    'container.build_id' => 'be68f8a0',
    'container.build_time' => 1712120436,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'Container7vxR8pM');

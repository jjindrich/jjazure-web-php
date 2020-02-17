<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette\Application\UI\Form;

final class HomepagePresenter extends BasePresenter
{
	public function createComponentForm(): Form
    {
        $f = new Form();
        $f->addSubmit('click', 'Click me to redirect.');
        $f->onSuccess[] = function() {
            $this->redirect('Sign:in');
        };
        return $f;
    }
}

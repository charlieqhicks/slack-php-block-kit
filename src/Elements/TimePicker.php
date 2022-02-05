<?php

declare(strict_types=1);

namespace SlackPhp\BlockKit\Elements;

use DateTime;
use SlackPhp\BlockKit\Elements\Traits\{HasConfirm, HasPlaceholder};
use SlackPhp\BlockKit\Parts\Confirm;
use SlackPhp\BlockKit\Property;
use SlackPhp\BlockKit\Tools\Validation\ValidDatetime;

class TimePicker extends Input
{
    use HasConfirm;
    use HasPlaceholder;

    #[Property('initial_time'), ValidDatetime('H:i', 'HH:MM')]
    public ?string $initialTime;

    public function __construct(
        ?string $actionId = null,
        DateTime|string|null $initialTime = null,
        ?string $placeholder = null,
        ?Confirm $confirm = null,
        ?bool $focusOnLoad = null,
    ) {
        parent::__construct($actionId, $focusOnLoad);
        $this->confirm($confirm);
        $this->placeholder($placeholder);
        $this->initialTime($initialTime);
    }

    public function initialTime(DateTime|string|null $initialTime): self
    {
        $this->initialTime = ($initialTime instanceof DateTime) ? $initialTime->format('H:i') : $initialTime;

        return $this;
    }
}

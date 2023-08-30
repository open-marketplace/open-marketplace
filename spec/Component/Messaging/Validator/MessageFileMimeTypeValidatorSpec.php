<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Messaging\Validator;

use BitBag\OpenMarketplace\Component\Messaging\Entity\MessageInterface;
use BitBag\OpenMarketplace\Component\Messaging\Validator\Constraint\MessageFileMimeTypeConstraint;
use BitBag\OpenMarketplace\Component\Messaging\Validator\MessageFileMimeTypeValidator;
use PhpSpec\ObjectBehavior;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidatorInterface;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Violation\ConstraintViolationBuilderInterface;

final class MessageFileMimeTypeValidatorSpec extends ObjectBehavior
{
    public function let(): void
    {
        $this->beConstructedWith(['text/html', 'application/javascript']);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(MessageFileMimeTypeValidator::class);
        $this->shouldImplement(ConstraintValidatorInterface::class);
    }

    public function it_throws_an_exception_on_wrong_constraint(
        Constraint $constraint,
        MessageInterface $message
    ): void {
        $this
            ->shouldThrow(UnexpectedTypeException::class)
            ->during('validate', [$message, $constraint]);
    }

    public function it_do_nothing_if_value_null(
        ExecutionContextInterface $executionContext,
    ): void {
        $constraint = new MessageFileMimeTypeConstraint();

        $this->initialize($executionContext);

        $this->validate(null, $constraint);

        $executionContext->addViolation($constraint->message)->shouldNotBeCalled();
    }

    public function it_do_nothing_if_value_empty(
        ExecutionContextInterface $executionContext,
    ): void {
        $constraint = new MessageFileMimeTypeConstraint();

        $this->initialize($executionContext);

        $this->validate('', $constraint);

        $executionContext->addViolation($constraint->message)->shouldNotBeCalled();
    }

    public function it_does_not_add_violation_if_file_has_different_type(
        ExecutionContextInterface $executionContext
    ): void {
        $constraint = new MessageFileMimeTypeConstraint();
        $file = new File(__FILE__);

        $this->initialize($executionContext);

        $this->validate($file, $constraint);

        $executionContext->addViolation($constraint->message)->shouldNotHaveBeenCalled();
    }

    public function it_adds_validation_if_file_has_not_allowed_type(
        ExecutionContextInterface $executionContext,
        ConstraintViolationBuilderInterface $constraintViolationBuilder
    ): void {
        $constraint = new MessageFileMimeTypeConstraint();
        $this->beConstructedWith(['text/x-php']);
        $file = new File(__FILE__);

        $this->initialize($executionContext);

        $this->validate($file, $constraint);

        $executionContext->addViolation($constraint->message, ['{{ type }}' => '"text/x-php"'])->shouldHaveBeenCalledOnce();
    }
}

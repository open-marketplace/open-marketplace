<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\ProductListing\Validator;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTranslationInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Validator\Constraint\UniqueProductListingSlugConstraint;
use BitBag\OpenMarketplace\Component\ProductListing\Validator\UniqueProductListingSlugValidator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidatorInterface;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Violation\ConstraintViolationBuilderInterface;

class UniqueProductListingSlugValidatorSpec extends ObjectBehavior
{
    public function let(RepositoryInterface $productTranslationRepository, RequestStack $requestStack): void
    {
        $this->beConstructedWith($productTranslationRepository, $requestStack);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(UniqueProductListingSlugValidator::class);
        $this->shouldImplement(ConstraintValidatorInterface::class);
    }

    public function it_throws_an_exception_on_wrong_constraint(
        Constraint $constraint,
        DraftTranslationInterface $existingProductTranslation,
    ): void {
        $this
            ->shouldThrow(UnexpectedTypeException::class)
            ->during('validate', [$existingProductTranslation, $constraint]);
    }

    public function it_adds_violation_if_creating_new_product_draft_with_taken_slug(
        RepositoryInterface $productTranslationRepository,
        DraftTranslationInterface $existingProductTranslation,
        ExecutionContextInterface $executionContext,
        ConstraintViolationBuilderInterface $builder,
        RequestStack $requestStack,
        Request $request,
        ): void {
        $constraint = new UniqueProductListingSlugConstraint();
        $this->initialize($executionContext);

        $existingProductTranslation->getSlug()->willReturn('slug');
        $requestStack->getCurrentRequest()->willReturn($request);
        $request->get('_route')->willReturn(UniqueProductListingSlugValidator::PRODUCT_LISTING_CREATE_PRODUCT_ROUTE);
        $productTranslationRepository->findOneBy(['slug' => 'slug'])->willReturn($existingProductTranslation);

        $builder->atPath('slug')->willReturn($builder);
        $builder->setInvalidValue(Argument::any())->willReturn($builder);
        $builder->setCode(Argument::any())->willReturn($builder);
        $executionContext->buildViolation($constraint->message)->willReturn($builder);

        $this->validate($existingProductTranslation, $constraint);

        $builder->addViolation()->shouldBeCalled();
    }

    public function it_does_not_add_violation_if_slug_not_taken(
        RepositoryInterface $productTranslationRepository,
        DraftTranslationInterface $existingProductTranslation,
        ExecutionContextInterface $executionContext,
        ConstraintViolationBuilderInterface $builder,
        RequestStack $requestStack,
        Request $request,
        ): void {
        $constraint = new UniqueProductListingSlugConstraint();
        $this->initialize($executionContext);

        $existingProductTranslation->getSlug()->willReturn('slug');
        $requestStack->getCurrentRequest()->willReturn($request);
        $request->get('_route')->willReturn(UniqueProductListingSlugValidator::PRODUCT_LISTING_CREATE_PRODUCT_ROUTE);
        $productTranslationRepository->findOneBy(['slug' => 'slug'])->willReturn(null);

        $builder->atPath('slug')->willReturn($builder);
        $builder->setInvalidValue(Argument::any())->willReturn($builder);
        $builder->setCode(Argument::any())->willReturn($builder);
        $executionContext->buildViolation($constraint->message)->willReturn($builder);

        $this->validate($existingProductTranslation, $constraint);

        $builder->addViolation()->shouldNotBeCalled();
    }
}

<?php

namespace Kunstmaan\AdminBundle\DependencyInjection\Security\Factory;

use Symfony\Bundle\SecurityBundle\DependencyInjection\Security\Factory\SecurityFactoryInterface;
use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Security factory used to inject GuestUserListener
 */
class GuestUserFactory implements SecurityFactoryInterface
{
    protected $options = array(
        'username' => 'guest',
    );

    /**
     * @param ContainerBuilder $container         The container
     * @param int              $id                The id
     * @param mixed            $config            The configuration
     * @param mixed            $userProvider      The user provider
     * @param mixed            $defaultEntryPoint The default entry point
     *
     * @return array
     */
    public function create(ContainerBuilder $container, $id, $config, $userProvider, $defaultEntryPoint)
    {
        // We don't need a custom provider yet, so use pre-authenticated provider...
        $providerId = 'security.authentication.provider.pre_authenticated.'.$id;
        $container
            ->setDefinition($providerId, new DefinitionDecorator('security.authentication.provider.pre_authenticated'))
            ->replaceArgument(0, new Reference($userProvider))
            ->addArgument($id);

        $listenerId = 'security.authentication.listener.kunstmaan.guest.'.$id;
        $container
            ->setDefinition($listenerId, new DefinitionDecorator('kunstmaan_admin.guest.security.authentication.listener'))
            ->replaceArgument(1, new Reference($userProvider))
            ->replaceArgument(2, $id);

        return array($providerId, $listenerId, $defaultEntryPoint);
    }

    /**
     * @param NodeDefinition $node
     */
    public function addConfiguration(NodeDefinition $node)
    {
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return 'guest_user';
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return 'pre_auth';
    }
}

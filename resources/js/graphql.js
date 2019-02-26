import gql from "graphql-tag";

export const CHANNELS_QUERY = gql`
    query {
        channels {
            id
            name
        }
    }
`;

export const CHANNEL_QUERY = gql`
    query ($id: ID!){
        channels(id: $id) {
            id
            name
            purpose
        }
    }`;


export const ME_QUERY = gql`
    query {
        me {
            id
            name
            display
            color
            color_two
        }
    }
`;

export const MESSAGES_QUERY = gql`
    query ($id: ID!){
        messages(channel_id: $id) {
            id
            payload
            created_at
            user{
                display
                color
                color_two
            }
        }
    }`;

export const SEND_MESSAGE_MUTATION = gql`
    mutation ($payload: String!, $channel_id: Int!) {
        sendMessage(payload: $payload, channel_id: $channel_id){
            id
        }
    }
 `;

export const UPDATE_USER_MUTATION = gql`
    mutation ($display: String!, $color: String!, $color_two: String!, $name: String!) {
        updateUser(display: $display, color: $color, color_two: $color_two, name: $name){
            id
        }
    }
 `;

export const USERS_QUERY = gql`
    query {
        users {
            id
            name
            display
            color
            color_two
        }
    }
`;
